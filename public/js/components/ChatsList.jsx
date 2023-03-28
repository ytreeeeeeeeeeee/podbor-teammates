import ChatListElement from "./ChatListElement";
import {useContext} from "react";
import ChatContext from "../context/chatContext";

function ChatsList() {
    const {chats} = useContext(ChatContext);

    const renderedChats = chats.map((chat) => {
        return (
            <ChatListElement key={chat.id} chat={chat} />
        );
    });

    return (
        <div className="chats-list">
            {renderedChats}
        </div>
    );
}

export default ChatsList;
