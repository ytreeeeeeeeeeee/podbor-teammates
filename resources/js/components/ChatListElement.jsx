import {useContext} from "react";
import ChatContext from "../context/chatContext";

function ChatListElement({chat}) {
    const {chooseChat} = useContext(ChatContext);

    const newChat = () => {
        chooseChat(chat.id);
    }

    return (
        <div className='chats-list__item' onClick={newChat}>
            <img className='card-avatar' src={chat.avatar} alt=""/>
            <p className='profile-nickname'>{chat.name}</p>
        </div>
    );
}

export default ChatListElement;
