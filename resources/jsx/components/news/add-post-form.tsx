import React, {useState} from 'react';
import {Button, Col, Divider, Input, Row, Tooltip, Typography} from 'antd';
import {
    BarChartOutlined,
    FileImageOutlined,
    FileOutlined,
    SendOutlined,
    QuestionCircleOutlined,
    PlayCircleOutlined, CheckOutlined
} from '@ant-design/icons';
import {PollForm} from './poll-form';
import debounce from 'lodash/debounce';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {EmojiPicker} from '../emoji-picker';
import {UserAvatar} from '../UserAvatar';
import {authUserIsn} from '../../authUserIsn';
import {AjaxButton} from '../ajax';
import {ISN} from '../../types';
import {BaseEmoji} from 'emoji-mart';
import {useFileReader} from '../../hooks/useFileReader';

export interface AddPostFormProps {
    onAddPost(data: AddPostData): void;
}

interface PollData {
    question: any;
    answers: any[];
}

interface AddPostData {
    postText: string;
    poll: PollData;
    isn: ISN;
}

export interface FileButtonProps {
    children: React.ReactNode;
    icon: any;

    onFilesSelected(files: FileList | null): void;

    accept: string;
    multiple?: boolean;
}

export function FileButton({children, icon, onFilesSelected, accept, multiple = true}: FileButtonProps) {
    let uploadRef = React.createRef<HTMLInputElement>();

    return <span>
        <input type="file"
               ref={uploadRef}
               hidden
               multiple={multiple}
               accept={accept}
               onChange={(e) => {
                   onFilesSelected(e.target.files);
               }} />
        <Button icon={icon} onClick={() => {
            if (!uploadRef.current) {
                return;
            }
            uploadRef.current.click();
        }}>{children}</Button>
    </span>
}

let useLocalStorage = createUseLocalStorage('newPost');

export function PublishInfo() {
    return <Tooltip placement="bottom"
                    title="Черновик публикации сохраняется в браузере. Вы сможете вернуться к нему в любой момент.">
        <QuestionCircleOutlined />
    </Tooltip>;
}

export function AddPostForm({onAddPost}: AddPostFormProps) {
    let maxLength = 2000;
    let [showPollForm, setShowPollForm] = useLocalStorage('showPollForm', false);
    let [postText, setPostText] = useLocalStorage('postText', '');
    let [pollData, setPollData] = useState<PollData | null>(null);
    let [draftSaved, setDraftSaved] = useState(false);
    let [textFieldHeight, setTextFieldHeight] = useLocalStorage<number>('textFieldHeight', 55);

    let [{result, error, loading}, setFile]: any[] = useFileReader({
        method: 'readAsDataURL',
    });

    let showPublishButton = !!postText.trim();

    let postData: any = {
        postText,
        poll: 0,
        isn: authUserIsn(),
    };

    if (pollData) {
        postData.poll = 1;
        postData.question = pollData.question;
        postData.answers = pollData.answers;
    }

    let publishBtn = <AjaxButton<AddPostData, AddPostData>
        method="POST"
        url="/news/addPost"
        data={postData}
        icon={<SendOutlined />}
        disabled={!showPublishButton}
        type="default"
        onSuccess={(response) => {
            onAddPost(response.data);
            setPostText('');
            setShowPollForm(false);
        }}>
        Опубликовать
    </AjaxButton>;

    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Typography.Title level={4}>
                        Создайте публикацию

                        <Divider type="vertical" />

                        <PublishInfo />
                    </Typography.Title>
                </Col>
                <Col offset={8} md={4}>
                    {/*{draftSaved ? <span>Черновик сохранён </span> : null}*/}
                </Col>
            </Row>
            <Row style={{backgroundColor: 'white'}}>
                <Col md={3} className="d-flex justify-content-center align-items-center">
                    <UserAvatar isn={authUserIsn()} />
                </Col>
                <Col md={20}>
                    <Input.TextArea
                        placeholder="Что у вас нового?"
                        value={postText}
                        allowClear
                        maxLength={maxLength}
                        bordered={false}
                        rows={5}
                        style={{
                            padding: 20
                        }}
                        spellCheck
                        onResize={(({height}) => {
                            setTextFieldHeight(height);
                        })}
                        onChange={(e) => {
                            setPostText(e.target.value);

                            if (e.target.value) {
                                debounce(() => {
                                    setDraftSaved(true);

                                    setTimeout(() => {
                                        setDraftSaved(false);
                                    }, 1500);
                                }, 1500)();
                            }
                        }} />
                    <span style={{float: 'right'}}>
                        {maxLength - postText.length}/{maxLength} символов
                    </span>
                </Col>
                <Col md={1}>
                    <EmojiPicker onSelect={(data) => {
                        setPostText(postText + (data as BaseEmoji).native);
                    }} />
                </Col>
            </Row>
            <Divider type="horizontal" style={{margin: '12px 0'}} />
            <Row>
                <Col md={24}>
                    <span> {result.length} </span>
                </Col>
            </Row>
            <Row>
                <Col md={18}>
                    <FileButton
                        icon={<FileImageOutlined />}
                        accept="image/*"
                        onFilesSelected={(files) => {
                            if (!files) {
                                return;
                            }
                            setFile(files[0])
                        }}>
                        <Tooltip title="Не работает">
                            Фото
                        </Tooltip>
                    </FileButton>
                    <Divider type="vertical" />
                    <FileButton
                        icon={<PlayCircleOutlined />}
                        accept="video/*"
                        onFilesSelected={(files) => {
                        }}>
                        <Tooltip title="Не работает">
                            Видео
                        </Tooltip>
                    </FileButton>
                    <Divider type="vertical" />
                    <FileButton icon={<FileOutlined />}
                                accept="*/*"
                                onFilesSelected={(files) => {
                                }}>
                        <Tooltip title="Не работает">
                            Файл
                        </Tooltip>
                    </FileButton>
                    <Divider type="vertical" />
                    <Button onClick={() => {
                        setShowPollForm(!showPollForm);
                    }} icon={<BarChartOutlined />} type={showPollForm ? 'primary' : 'default'}>Опрос</Button>
                </Col>
                <Col offset={1} md={3}>
                    {publishBtn}
                </Col>
            </Row>
            {showPollForm ? <PollForm onUpdatePoll={(data) => {
                setPollData(data);
            }} /> : null}
        </Col>
    </Row>
}
