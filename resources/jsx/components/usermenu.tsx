import React from 'react';
import {Dropdown, Menu} from 'antd';
import {DownOutlined} from '@ant-design/icons';

declare var messaging: any;
declare var sendTokenToServer: any;
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
            <DownOutlined />
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
