import './bootstrap';
import axios from "axios";

const userInfoId = JSON.parse(document.querySelector('.user-all-info').dataset.userInfo);

const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let globalTeammate = '';

const handleUnload = () => {
    let formData = new FormData();
    formData.append('teammate', globalTeammate);

    axios.post(`/decline-search/${globalTeammate}`, formData)
}

Echo.private('teammate-found.' + userInfoId).notification((notification) => {
    displayModalOnline(notification.teammate, true);
});

Echo.private('redirect.' + userInfoId).notification((notification) => {
    localStorage.clear();
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = notification.url;
    let token = document.createElement('input');
    token.name = '_token';
    token.value = csrf;
    form.appendChild(token);
    document.body.appendChild(form);
    form.submit();
});

Echo.private('continue.' + userInfoId).notification((notification) => {
    document.querySelector('.modal-request').remove();
    window.removeEventListener('beforeunload', handleUnload);
    if (!notification.owner) {
        let array = JSON.parse(localStorage.getItem('exception')) || [];
        typeof array == 'object' ? array.push(notification.exception) : array = [array, notification.exception];
        localStorage.setItem('exception', JSON.stringify(array));
        let exception = localStorage.getItem('exception')
        let formData = new FormData();
        formData.append('exception', exception);
        formData.append('game', localStorage.getItem('game'));

        axios.post('/online-search', formData)
            .then((response) => {
                if(response.data) {
                    localStorage.clear();
                }
                window.location.href = '/online';
            }).catch((error) => {
                console.log(error.response);
            });
    }
});

Echo.private('decision-online.' + userInfoId).notification((notification) => {
    const decisionsBlock = document.getElementById('decision-teammate');
    decisionsBlock.classList.remove('no-visible');

    let teammateDecision = document.createElement('p');
    teammateDecision.classList.add('teammate-decision-text');
    let teammateNickname = document.createElement('span');
    teammateNickname.classList.add('teammate-decision-name');

    teammateNickname.innerText = notification.name;
    teammateDecision.appendChild(teammateNickname);

    if (notification.decision) {
        teammateDecision.style.color = '#359f00';
        teammateDecision.innerHTML += ' принял заявку'
    }
    else {
        teammateDecision.style.color = '#930000';
        teammateDecision.innerHTML += ' отклонил заявку'
    }

    decisionsBlock.appendChild(teammateDecision);
});

const teammateInfo = document.getElementById('teammate-info');

if (teammateInfo)
    await displayModalOnline(teammateInfo.dataset.teammate, false);

async function displayModalOnline(teammate, owner) {
    globalTeammate = teammate;
    await axios.get('/notification-handle', {
        params: {
            teammate: teammate,
            owner: owner
        }
    }).then((response) => {
        if (!owner) {
            window.addEventListener('beforeunload', handleUnload);
        }
        const main = document.querySelector('main');
        main.innerHTML += response.data;
        const myForm = document.getElementById('decision-online-form');
        const buttonsBlock = document.getElementById('online-buttons');
        const submitButtons = document.querySelectorAll('#online-button');

        myForm.addEventListener('submit', function(event) {
            event.preventDefault();
            submitButtons.forEach((button) => {
                button.disabled = true;
            });

            let formData = new FormData(myForm);
            formData.append('action', event.submitter.value);
            formData.append('teammate', teammate);
            formData.append('owner', owner);

            axios.post(`/online-decision/${owner ? userInfoId : teammate}`, formData,{
                withCredentials: true,
            }).then((response) => {
                buttonsBlock.classList.add('no-visible');
            }).catch((error) => {
                console.log(error.response.data.message);
            });
        });
    }).catch((error) => {
        console.log(error.response.data.message);
    });
}
