import React, {useState} from 'react';
import {Avatar, Button, Col, Divider, Input, Row} from 'antd';
import {
    BarChartOutlined,
    FileImageOutlined,
    FileOutlined,
    SendOutlined,
    VideoCameraOutlined
} from '@ant-design/icons';
import {PollForm} from './poll-form';
import {Ajax} from '../../ajax';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';

export interface AddPostFormProps {
    onAddPost(data: AddPostData): void;
}

interface AddPostData {
    postText: string;
    poll: any;
    isn: any;
}

let useLocalStorage = createUseLocalStorage('newPost');

export function AddPostForm({onAddPost}: AddPostFormProps) {
    let [showPollForm, setShowPollForm] = useState(false);
    let [postText, setPostText] = useLocalStorage('postText', '');
    let showPublishButton = !!postText;
    let AjaxButton = ({...props}: any) => <Ajax.Button<any, any> {...props} />;

    let publishBtn = <AjaxButton
        url="/news/addPost"
        data={{
            postText,
            poll: 0,
            isn: 5565
        }}
        type="default"
        icon={<SendOutlined />}
        method="POST"
        onSuccess={(response: any) => {
            onAddPost(response.data);
            setPostText('');
        }}>
        Опубликовать
    </AjaxButton>;

    return <div>
        <Row>
            <Col>
                Создайте публикацию
            </Col>
        </Row>
        <Row>
            <Col md={4}>
                <Avatar size={64} src="/images/avatar.png" />
            </Col>
            <Col md={18}>
                <Input.TextArea placeholder="Что у вас нового?" value={postText} onChange={(e) => {
                    setPostText(e.target.value);
                }} />
            </Col>
            <Col md={2}>
                <Button type="text">
                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z" />
                    </svg>
                </Button>
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        <Row>
            <Col>
                <Button icon={<FileImageOutlined />}>Фото</Button>
                <Divider type="vertical" />
                <Button icon={<VideoCameraOutlined />}>Видео</Button>
                <Divider type="vertical" />
                <Button icon={<FileOutlined />}>Файл</Button>
                <Divider type="vertical" />
                <Button onClick={() => {
                    setShowPollForm(!showPollForm)
                }} icon={<BarChartOutlined />}>Опрос</Button>
            </Col>
            <Col offset={1}>
                {showPublishButton ? publishBtn : null}
            </Col>
        </Row>
        <Divider type="horizontal" style={{margin: '12px 0'}} />
        {showPollForm ? <PollForm /> : null}
    </div>
}
