import './bootstrap';

const userAllInfo = JSON.parse(document.querySelector('.user-all-info').dataset.userInfo);

Echo.private('App.Models.User.' + userAllInfo.id).notification((notification) => {
    console.log(notification);
});
