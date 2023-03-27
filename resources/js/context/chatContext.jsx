import {createContext, useEffect, useState} from "react";
import Pusher from "pusher-js";
import axios from "axios";

const ChatContext = createContext();

function Provider({children, chats, user}) {
    const [activeChat, setActiveChat ]= useState(chats[0].id);
    const [messages, setMessages] = useState([]);

    useEffect(() => {
        const pusher = new Pusher('b99b1acf1468b0f87d7c', {
            cluster: 'eu',
        });

        const channel = pusher.subscribe('chat');
        channel.bind('App//Events//NewMessage', (data) => {
            console.log(data);
            setMessages(data.message);
        });
    }, []);

    const getMessages = async () => {
        await axios.get('/get-messages',{
            params: {
                chatId: activeChat
            }
        }).then((response) => {
            setMessages(response.data);
        }).catch(error => {
            console.log(error.response.data.message);
        });
    }

    const sendMessages = async (message, receiver) => {
        await axios.post('/send-message', {
            receiver: receiver,
            text: message,
        }).then((response) => {
            setMessages((messages) => [...messages, response.data]);
        }).catch(error => {
            console.log(error.response.data.message);
        });
    }

    const chooseChat = (chatId) => {
        setActiveChat(chatId);
    }

    const chatsData = {
        chats, activeChat, messages, chooseChat, getMessages, sendMessages, user
    };

    return (
        <ChatContext.Provider value={chatsData}>
            {children}
        </ChatContext.Provider>
    );
}

export {Provider};
export default ChatContext;
