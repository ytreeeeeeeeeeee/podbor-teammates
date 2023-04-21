import {useContext, useEffect, useRef, useState} from "react";
import ChatContext from "../context/chatContext";
import Message from "./Message";

function Messages() {
    const [text, setText] = useState('');
    const {getMessages, messages, activeChat, sendMessages} = useContext(ChatContext);
    const messageRef = useRef();

    useEffect(() => {
        getMessages();
    }, [activeChat]);

    useEffect(() => {
        messageRef.current.scrollTop = messageRef.current.scrollHeight;
    }, [messages]);

    const handleChange = (event) => {
        setText(event.target.value);
    };

    const send = (event) => {
        event.preventDefault();
        setText('');
        sendMessages(text, activeChat);
    };

    const renderedMessages = messages.map((message) => {
        return (
            <Message key={message.id} message={message} />
        );
    });

    return(
        <>
            <div className='message-container'>
                <div className='messages' id='messages' ref={messageRef}>
                    {renderedMessages}
                    <div></div>
                </div>
                <form onSubmit={send} className='form-chat'>
                    <input value={text} onChange={handleChange} />
                    <button className='send-button'>Отправить</button>
                </form>
            </div>

        </>
    );
}

export default Messages;
