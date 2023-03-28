import {useContext, useEffect, useState} from "react";
import ChatContext from "../context/chatContext";
import Message from "./Message";

function Messages() {
    const [text, setText] = useState('');
    const {getMessages, messages, activeChat, sendMessages} = useContext(ChatContext);

    useEffect(() => {
        getMessages();
    }, [activeChat]);

    const handleChange = (event) => {
        setText(event.target.value);
    };

    const send = () => {
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
                <div className='messages'>
                    {renderedMessages}
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
