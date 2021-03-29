import React, {useState} from 'react';
import {Avatar, Button, Col, Divider, Input, Row, Typography} from 'antd';
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
import {EmojiPicker} from '../emoji-picker';

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
    let [showPollForm, setShowPollForm] = useLocalStorage('showPollForm', false);
    let [postText, setPostText] = useLocalStorage('postText', '');
    let [pollData, setPollData] = useState<any>(null);
    let [textFieldHeight, setTextFieldHeight] = useLocalStorage<number>('textFieldHeight', 55);
    let showPublishButton = !!postText.trim();
    let AjaxPublishPostButton = ({...props}: any) =>
        <Ajax.Button<any, any> {...props}
                               method="POST"
                               icon={<SendOutlined />}
                               url="/news/addPost" />;
    let postData: any = {
        postText,
        poll: 0,
        isn: 5565,
    };

    if (pollData) {
        postData.poll = 1;
        postData.question = pollData.question;
        postData.answers = pollData.answers;
    }

    let publishBtn = <AjaxPublishPostButton
        data={postData}
        disabled={!showPublishButton}
        type="default"
        onSuccess={(response: any) => {
            onAddPost(response.data);
            setPostText('');
            setShowPollForm(false);
        }}>
        Опубликовать
    </AjaxPublishPostButton>;

    return <Row>
        <Col md={24}>
            <Row>
                <Col>
                    <Typography.Title level={4}>
                        Создайте публикацию
                    </Typography.Title>
                </Col>
            </Row>
            <Row>
                <Col md={3}>
                    <Avatar size={64} src="/images/avatar.png" />
                </Col>
                <Col md={19}>
                    <Input.TextArea placeholder="Что у вас нового?"
                                    value={postText}
                                    allowClear
                                    style={{
                                        height: textFieldHeight,
                                    }}

                                    onResize={(({height}) => {
                                        setTextFieldHeight(height);
                                    })}
                                    onChange={(e) => {
                                        setPostText(e.target.value);
                                    }} />
                </Col>
                <Col md={2}>
                    <EmojiPicker onSelect={(data) => {
                        setPostText(postText + (data as any).native);
                    }} />
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
                    }} icon={<BarChartOutlined />} type={showPollForm ? 'primary' : 'default'}>Опрос</Button>
                </Col>
                <Col offset={1}>
                    {publishBtn}
                </Col>
            </Row>
            {showPollForm ? <PollForm onUpdatePoll={(data) => {
                setPollData(data);
            }} /> : null}
        </Col>
    </Row>
}
