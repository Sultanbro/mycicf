import React from 'react';
import 'antd/dist/antd.css';
import {Posts} from './components/news/posts';
import {Col, Divider, Row} from 'antd';
import {SuggestionBtn} from './components/suggestion-btn';
// import {Centcoins} from './components/centcoins/centcoins';
// import {Me} from './components/me/me';
// import {CentcoinOperationsList} from './components/centcoins/operations-list';
// import {CoordinationList} from './components/coordination/list';
// import {UserMenu} from './components/usermenu';
// import {Dossier} from './components/dossier/dossier';
// import {Sidebar} from './components/sidebar';
// import {Birthdays} from './components/birthdays/birthdays';
// import {BossPosts} from './components/news/boss-posts';
// import {ColleagueData} from './components/colleague-data';
// import {authUserIsn} from './authUserIsn';
// import {UserName} from './UserName';

export interface MyCiCNewsProps {
}

export function MyCiCNews({}: MyCiCNewsProps) {
    // debugger;
    // (window as any).Echo.private(`post`)
    //     .listen('NewPost', (e: any) => {
    //         debugger;
    //     });

    return <Row style={{background: '#e9ebee', padding: '20px'}}>
        <Col md={24}>
            <Row>
                <Col md={6}>
                    {/*<SuggestionBtn />*/}
                </Col>
                <Col offset={10} md={8}>
                    <a href="/news">
                        Вернуться к старому интерфейсу
                    </a>
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Divider />
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Posts />
                </Col>
            </Row>
        </Col>
    </Row>;
}
