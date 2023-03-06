from flask import Flask, render_template, request
from chatbot import app
from chatbot.chatbot import chatbot_response

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/get')
def get_bot_response():
    user_text = request.args.get('msg')
    response = chatbot_response(user_text)
    return str(response)

if __name__ == '__main__':
    app.run(debug=True)
