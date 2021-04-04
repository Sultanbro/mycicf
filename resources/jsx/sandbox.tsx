import React from 'react';
import {FileForm} from './components/news/files-form';
import {Birthdays} from './components/birthdays/birthdays';
import {Col, Row} from 'antd';

export function Sandbox({}: any) {
    return <div>
        {/*<ColleagueData isn={authUserIsn()} />*/}

        {/*<FileForm />*/}

        <Row>
            <Col md={2} sm={3}>
                <Birthdays />
            </Col>
        </Row>

        {/*<Centcoins />*/}

        {/*<CentcoinOperationsList />*/}

        {/*<CoordinationList />*/}

        {/*<UserMenu />*/}

        {/*<BossPosts />*/}

        {/*<Dossier />*/}

        {/*<Sidebar />*/}

        {/*<UserName isn={'5565'} username={'Developer'} />*/}
    </div>;
}
