import pandas as pd
import joblib
import string
import unicodedata
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB

# --- Funções auxiliares ---
def remover_acentos(texto):
    return ''.join(
        c for c in unicodedata.normalize('NFD', texto)
        if unicodedata.category(c) != 'Mn'
    )

def preprocess(text):
    text = remover_acentos(text.lower())
    text = text.translate(str.maketrans('', '', string.punctuation))
    return text


# --- Função para adicionar frase ---
def adicionar_frase(frase: str, intencao: str):
    """Adiciona uma nova frase ao dataset e re-treina o modelo."""
    # 1️⃣ Carregar dataset existente
    df = pd.read_csv("dados_planos.csv")

    # 2️⃣ Adicionar nova linha
    nova_linha = pd.DataFrame([[frase, intencao]], columns=["frase", "intencao"])
    df = pd.concat([df, nova_linha], ignore_index=True)

    # 3️⃣ Salvar CSV atualizado
    df.to_csv("dados_planos.csv", index=False, encoding="utf-8")
    print(f"🆕 Frase adicionada: '{frase}' → intenção: '{intencao}'")

    # 4️⃣ Pré-processar
    df['frase'] = df['frase'].apply(preprocess)

    # 5️⃣ Re-treinar modelo
    vectorizer = CountVectorizer()
    X = vectorizer.fit_transform(df['frase'])
    y = df['intencao']

    modelo = MultinomialNB()
    modelo.fit(X, y)

    # 6️⃣ Salvar novamente modelo e vetor
    joblib.dump(modelo, "modelo_planos.pkl")
    joblib.dump(vectorizer, "vectorizer_planos.pkl")

    print("✅ Modelo atualizado e salvo com sucesso!")


# --- Exemplo de uso ---
if __name__ == "__main__":
    frase = input("Digite a nova frase: ")
    intencao = input("Digite a intenção (ex: planos, cobertura, precos...): ")
    adicionar_frase(frase, intencao)
