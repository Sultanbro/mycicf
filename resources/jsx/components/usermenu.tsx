import React from 'react';
import {Dropdown, Menu, notification} from 'antd';
import {DownOutlined} from '@ant-design/icons';
import {authUserName} from '../authUserName';
import {UserAvatar} from './UserAvatar';
import {authUserIsn} from '../authUserIsn';

declare var messaging: any;
declare var setTokenSentToServer: any;

export interface UserMenuProps {

}

export function UserMenu({}: UserMenuProps) {
    const menu = (
        <Menu>
            <Menu.Item onClick={() => subscribe()}>
                <a href="#" onClick={e => e.preventDefault()}>
                    Уведомления
                </a>
            </Menu.Item>
            <Menu.Item>
                <a href="/logout">
                    Выйти
                </a>
            </Menu.Item>
        </Menu>
    );
    return <Dropdown overlay={menu}>
        <a className="ant-dropdown-link" onClick={e => e.preventDefault()}>
            <UserAvatar isn={authUserIsn()} size="default" />
            {authUserName()} <DownOutlined />
        </a>
    </Dropdown>
}



function subscribe() {
    // запрашиваем разрешение на получение уведомлений
    messaging.requestPermission()
        .then(function () {
            // получаем ID устройства
            messaging.getToken()
                .then(function (currentToken: any) {
                    console.log(currentToken);

                    if (currentToken) {
                        sendTokenToServer(currentToken);
                    } else {
                        console.warn('Не удалось получить токен.');
                        setTokenSentToServer(false);
                    }
                })
                .catch(function (err: any) {
                    console.warn('При получении токена произошла ошибка.', err);
                    setTokenSentToServer(false);
                });
        })
        .catch(function (err: any) {
            console.warn('Не удалось получить разрешение на показ уведомлений.', err);
        });
}

// отправка ID на сервер
function sendTokenToServer(currentToken: any) {
    // if (!isTokenSentToServer(currentToken)) {
    console.log('Отправка токена на сервер...');

    var url = '/setToken'; // адрес скрипта на сервере который сохраняет ID устройства
    var http = new XMLHttpRequest();
    var params = currentToken;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            notification.info({
                message: "Вы успешно подписались на уведомления"
            });
        }
    }
    http.send(params);

    setTokenSentToServer(currentToken);
    // } else {
    //     console.log('Токен уже отправлен на сервер.');
    // }
}
