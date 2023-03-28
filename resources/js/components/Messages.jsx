import {useContext, useEffect, useRef, useState} from "react";
import ChatContext from "../context/chatContext";
import Message from "./Message";

function Messages() {
    const [text, setText] = useState('');
    const {getMessages, messages, activeChat, sendMessages} = useContext(ChatContext);
    const messageRef = useRef();
     const messagesContainer = document.getElementById('messages');

    useEffect(() => {
        getMessages();
    }, [activeChat]);

    const handleChange = (event) => {
        setText(event.target.value);
    };

    const send = (event) => {
        event.preventDefault();
        setText('');
        messagesContainer.scrollIntoView({behavior: 'smooth'})
        //messageRef.current.scrollIntoView({behavior: 'smooth'});
        // messagesContainer.scrollTop = messagesContainer.scrollHeight;
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
                <form onSubmit={send}>
                    <input value={text} onChange={handleChange} />
                    <button>бебебе</button>
                </form>
            </div>

        </>
    );
}

export default Messages;
