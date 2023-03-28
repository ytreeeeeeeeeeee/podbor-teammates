import ChatsList from "./ChatsList";
import Messages from "./Messages";
import {useContext} from "react";
import ChatContext from "../context/chatContext";

function Chat() {
    const {activeChat} = useContext(ChatContext)

    return (
        activeChat === -1 ?
            <div className='no-chats'>
                <h1 className='title title-no-chats'>У вас пока нет чатов</h1>
            </div>
            :
            <>
                <ChatsList />
                <Messages />
            </>
    );
}

export default Chat;
