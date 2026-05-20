import pandas as pd
import joblib
import unicodedata
import string

from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB

# remover acentos
def remover_acentos(texto):
    return ''.join(
        c for c in unicodedata.normalize('NFD', texto)
        if unicodedata.category(c) != 'Mn'
    )

# preprocessamento
def preprocess(texto):
    texto = remover_acentos(texto.lower())
    texto = texto.translate(str.maketrans('', '', string.punctuation))
    return texto

# carregar csv
df = pd.read_csv("dados_medseg.csv")

# aplicar preprocessamento
df["frase"] = df["frase"].apply(preprocess)

# frases e intenções
X = df["frase"]
y = df["intencao"]

# vetorizar texto
vectorizer = CountVectorizer()

X_vectorizado = vectorizer.fit_transform(X)

# criar modelo
modelo = MultinomialNB()

# treinar
modelo.fit(X_vectorizado, y)

# salvar arquivos
joblib.dump(modelo, "modelo_planos.pkl")
joblib.dump(vectorizer, "vectorizer_planos.pkl")

print("✅ Modelo treinado com sucesso!")
