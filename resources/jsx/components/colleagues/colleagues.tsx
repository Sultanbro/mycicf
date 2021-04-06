import React, {useState} from "react";
import {Ajax} from "../ajax";
import {SearchOutlined} from "@ant-design/icons";
import {Button, Col, Divider, Input, Row, TreeSelect} from "antd";
import {UserAvatar} from "../UserAvatar";
import {UserName} from "../../UserName";

interface BranchEntry {
    id: number;
    label: string;
    children?: BranchEntry[];
}

interface BranchEntryForTree {
    value: number;
    title: string;
    children?: BranchEntryForTree[];
}

function map(entry: BranchEntry): BranchEntryForTree {
    return {
        title: entry.label,
        value: entry.id,
        children: entry.children ? entry.children.map(entry => map(entry)) : []
    };
}

interface GetSearchBranchResponse {
    result: BranchEntry[];
    value: string;
}

interface SearchSelectProps {
    defaultValue: number;
    onChange: (value: number) => void;
}

function SearchSelect({defaultValue, onChange}: SearchSelectProps) {
    return <Ajax.POST<GetSearchBranchResponse> url="/getSearchBranch">
        {({response}) => {
            let data = response.data.result.map(entry => map(entry));
            return <TreeSelect treeData={data}
                               defaultValue={defaultValue}
                               treeDefaultExpandAll
                               onChange={onChange}
                               style={{width: '100%'}}/>;
        }}
    </Ajax.POST>;
}

interface EmployeeCardProps {
    data: EmployeeEntry;
}

export function EmployeeCard({data}: EmployeeCardProps) {
    return <Col md={12}>
        <Row>
            <Col md={4}>
                <a href={`/colleagues/${data.isn}/dossier`}>
                    <UserAvatar isn={data.isn} />
                </a>
            </Col>
            <Col md={20}>
                <p style={{marginBottom: 5}}>
                    <UserName isn={data.isn} username={data.name} />
                </p>
                <p style={{marginBottom: 5}}>{data.duty}</p>
                <p style={{marginBottom: 5}}>{data.department}</p>
            </Col>
        </Row>
    </Col>;
}

interface EmployeeEntry {
    isn: string;
    name: string;
    duty: string;
    department: string;
}

interface ColleaguesResponse {
    list: EmployeeEntry[];
}

export function Colleagues() {
    let [searchText, setSearchText] = useState('');
    let [parentId, setParentId] = useState(50);
    //https://my.cic.kz/colleagues/search

    return <Ajax.POST<ColleaguesResponse> url="/colleagues/search" data={{searchText, parentId}}>
        {({response, refetch}) => {
            return <Row>
                <Col md={24}>
                    <Row>
                        <Col md={8}>
                            <Input
                                defaultValue={searchText}
                                onChange={(e) => {
                                    setSearchText(e.target.value);
                                }}/>
                        </Col>
                        <Col md={1}>
                            <Divider type="vertical"/>
                        </Col>
                        <Col md={8}>
                            <SearchSelect
                                defaultValue={parentId}
                                onChange={(value) => {
                                    setParentId(value);
                                }}/>
                        </Col>
                        <Col md={1}>
                            <Divider type="vertical"/>
                        </Col>
                        <Col md={4}>
                            <Button icon={<SearchOutlined/>} block onClick={() => {
                                refetch();
                            }}/>
                        </Col>
                    </Row>
                    <Row style={{padding: 10}}>
                        <Col md={24}>
                            <Row>
                                {
                                    response.data.list.map((employee, index) =>
                                        <EmployeeCard
                                            key={index}
                                            data={employee}
                                        />
                                    )
                                }
                            </Row>
                        </Col>
                    </Row>
                </Col>
            </Row>;
        }}
    </Ajax.POST>;
}
