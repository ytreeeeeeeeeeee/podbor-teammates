import React from 'react';
import ReactDom from 'react-dom/client';
import Chat from "./Chat";
import {Provider} from "../context/chatContext";

const chatEl = document.getElementById('chat');
const chatsData = JSON.parse(chatEl.dataset.chats);
const userData = JSON.parse(chatEl.dataset.user);
const activeChat = JSON.parse(chatEl.dataset.active);
const chat = ReactDom.createRoot(chatEl);

chat.render(
    <Provider chats={chatsData} user={userData} active={activeChat}>
        <Chat />
    </Provider>
);
