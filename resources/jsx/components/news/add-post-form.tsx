import React, {useState} from 'react';
import {Button, Col, Divider, Input, Row, Tooltip, Typography} from 'antd';
import {
    SendOutlined,
    QuestionCircleOutlined,
} from '@ant-design/icons';
import debounce from 'lodash/debounce';
import {createUseLocalStorage} from '../../hooks/useLocalStorage';
import {EmojiPicker} from '../emoji-picker';
import {UserAvatar} from '../UserAvatar';
import {authUserIsn} from '../../authUserIsn';
import {AjaxButton} from '../ajax';
import {ISN} from '../../types';
import {BaseEmoji} from 'emoji-mart';
import {FileForm} from './files-form';
import Editor from "rich-markdown-editor";
import {editorDictionary} from "./editor-dict";

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

    onFilesSelected(files: FileList): void;

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
                   if (!e.target.files) {
                       return;
                   }

                   onFilesSelected(e.target.files);
               }}/>
        <Button icon={icon} onClick={() => {
            if (!uploadRef.current) {
                return;
            }
            uploadRef.current.click();
        }}>{children}</Button>
    </span>;
}

let useLocalStorage = createUseLocalStorage('newPost');

export function PublishInfo() {
    return <Tooltip placement="bottom"
                    title="Черновик публикации сохраняется в браузере. Вы сможете вернуться к нему в любой момент.">
        <QuestionCircleOutlined/>
    </Tooltip>;
}

export function AddPostForm({onAddPost}: AddPostFormProps) {
    let maxLength = 2000;
    let [, setShowPollForm] = useLocalStorage('showPollForm', false);
    let [postText, setPostText] = useLocalStorage('postText', '');
    let [pollData,] = useState<PollData | null>(null);
    let [, setDraftSaved] = useState(false);
    let [, setTextFieldHeight] = useLocalStorage<number>('textFieldHeight', 55);

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
        icon={<SendOutlined/>}
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

                        <Divider type="vertical"/>

                        <PublishInfo/>
                    </Typography.Title>
                </Col>
                <Col offset={8} md={4}>
                    {/*{draftSaved ? <span>Черновик сохранён </span> : null}*/}
                </Col>
            </Row>
            <Row style={{backgroundColor: 'white'}}>
                <Col md={4} className="d-flex justify-content-center align-items-center">
                    <UserAvatar isn={authUserIsn()}/>
                </Col>
                <Col md={19}>
                    <Editor
                        value={postText}
                        maxLength={maxLength}
                        dictionary={editorDictionary}
                        onChange={(e) => {
                            let value = e();
                            setPostText(value);
                        }}
                        placeholder="Что у вас нового?"
                    />
                    {/*<Input.TextArea
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
                        }} />*/}
                    <span style={{float: 'right'}}>
                        {maxLength - postText.length}/{maxLength} символов
                    </span>
                </Col>
                <Col md={1}>
                    <EmojiPicker
                        onSelect={(data) => {
                            setPostText(postText + (data as BaseEmoji).native);
                        }}/>
                </Col>
            </Row>
            <Divider/>
            <Row>
                <Col md={18}>
                    <FileForm/>
                </Col>
                <Col md={6}>
                    {publishBtn}
                </Col>
            </Row>
        </Col>
    </Row>;
}
