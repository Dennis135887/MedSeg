from flask import Flask, request, jsonify
from flask_cors import CORS
import joblib
import unicodedata
import string

app = Flask(__name__)
CORS(app)

modelo = joblib.load("modelo_planos.pkl")
vectorizer = joblib.load("vectorizer_planos.pkl")

def remover_acentos(texto):
    return ''.join(
        c for c in unicodedata.normalize('NFD', texto)
        if unicodedata.category(c) != 'Mn'
    )

def preprocess(texto):
    texto = remover_acentos(texto.lower())
    texto = texto.translate(str.maketrans('', '', string.punctuation))
    return texto

respostas = {
   

    "exames": """Realizamos exames ocupacionais obrigatórios conforme a legislação:
- Admissional
- Periódico
- Demissional
- Retorno ao trabalho
- Mudança de função
Esses exames garantem a aptidão do colaborador para suas atividades.""",

    "normas": """As Normas Regulamentadoras (NRs) são diretrizes do Ministério do Trabalho que garantem a segurança e saúde dos trabalhadores. Atuamos com NRs como NR-7 (PCMSO) e NR-9/PGR.""",

    "pcmso": """O PCMSO (Programa de Controle Médico de Saúde Ocupacional) é obrigatório para empresas e tem como objetivo monitorar a saúde dos colaboradores por meio de exames clínicos e ocupacionais.""",

    "pgr": """O PGR (Programa de Gerenciamento de Riscos) é responsável por identificar, avaliar e controlar riscos no ambiente de trabalho, sendo obrigatório para a maioria das empresas.""",

    "laudos": """Emitimos laudos técnicos como:
- LTCAT (Laudo Técnico das Condições Ambientais do Trabalho)
- Relatórios de risco ocupacional
Esses documentos são essenciais para conformidade legal.""",

    "esocial": """O sistema pode ser integrado ao eSocial, permitindo o envio automatizado de informações de saúde e segurança do trabalho, garantindo conformidade com a legislação.""",

    "chatbot": """Nosso chatbot utiliza Inteligência Artificial baseada em modelo bayesiano para responder dúvidas automaticamente sobre saúde ocupacional e funcionamento do sistema.""",

    "cadastro": """Você pode cadastrar empresas e funcionários diretamente na plataforma. O sistema permite gerenciar dados, vínculos e informações ocupacionais de forma segura.""",

    "contato": """Entre em contato com nosso suporte:
📞 (11) 99999-9999
📧 atendimento@medseg.com.br""",


    "planos": """Nossos valores dependem do número de funcionários e do grau de risco da empresa.
Temos planos especiais para:
- Microempreendedores (MEI)
- Pequenas e Médias Empresas (PME)
- Grandes indústrias
Para um orçamento detalhado, entre em contato com nosso comercial!""",

}

@app.route('/chat', methods=['POST'])
def chat():
    data = request.get_json()
    frase = preprocess(data.get("message", ""))

    if not frase:
        return jsonify({"reply": "Por favor, digite uma mensagem válida."}), 400

    X_input = vectorizer.transform([frase])
    intencao = modelo.predict(X_input)[0]
    resposta = respostas.get(intencao, "Desculpe, não entendi sua pergunta. Pode reformular?")

    return jsonify({"reply": resposta})

if __name__ == "__main__":
    app.run(debug=True)
