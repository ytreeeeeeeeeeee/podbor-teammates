import {useContext} from "react";
import ChatContext from "../context/chatContext";
import classNames from "classnames";

function Message({message}) {
    const {user} = useContext(ChatContext);

    const classes = classNames(
        'message-box',
        message.author_id === user ? 'my-message' : 'other-message',
    );

    return (
        <div className={classes}>
            {message.text}
        </div>
    );
}

export default Message;
