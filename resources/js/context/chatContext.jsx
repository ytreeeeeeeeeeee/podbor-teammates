import {createContext, useEffect, useState} from "react";
//import Echo from 'laravel-echo';
import Pusher from "pusher-js";
import axios from "axios";
import '../bootstrap';

const ChatContext = createContext();

function Provider({children, chats, user}) {
    const [activeChat, setActiveChat ]= useState(chats.length !== 0 ? chats[0].id : -1);
    const [messages, setMessages] = useState([]);

    useEffect(() => {
        Echo.private(`chat.${activeChat}`)
            .listen('message', (e) => {
                console.log(e);
                setMessages((messages) => [...messages, e.data]);
            });

        return () => {
            Echo.leaveChannel(`chat.${activeChat}`);
        };
    }, [activeChat])


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

    const sendMessages = async (message) => {
        await axios.post('/send-message', {
            chat_id: activeChat,
            text: message,
        }).then((response) => {
            if (response.data){
                setMessages((messages) => [...messages, response.data]);
            }
        }).catch(error => {
            if (error.response.status !== 422) {
                console.log(error.response.data.message);
            }
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
