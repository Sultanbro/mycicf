import React from 'react';
import {Collapse} from 'antd';
import {authUserName} from '../authUserName';
import {Ajax} from './ajax/ajax';

interface ColleagueDataProps {
    isn: string;
}

interface ColleagueResponse {
    response: {
        Duty: string;
        Birthday: string;
        City: string;
        Married: string;
        Education: string;
    };
}

export function ColleagueData({isn}: ColleagueDataProps) {
    return <Ajax.POST<ColleagueResponse> url="/getColleagueData" data={{isn}}>
        {({response}) => {
            return <Collapse defaultActiveKey={0}>
                <Collapse.Panel key={0} header={authUserName()}>
                    <p><b>{response.data.response.Duty}</b></p>
                    <p><b>Дата рождения:</b> {response.data.response.Birthday}</p>
                    <p><b>Место рождения:</b> {response.data.response.City}</p>
                    <p><b>Семейное положение:</b> {response.data.response.Married}</p>
                    <p><b>Образование:</b> {response.data.response.Education}</p>
                </Collapse.Panel>
            </Collapse>
        }}
    </Ajax.POST>
}
