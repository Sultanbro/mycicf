import React, { useState } from 'react';
import { Button, Col, Divider, Row, Tooltip, Typography } from 'antd';
import {
  SendOutlined,
  QuestionCircleOutlined,
  BarChartOutlined
} from '@ant-design/icons';
import { createUseLocalStorage } from '../../hooks/useLocalStorage';
import { EmojiPicker } from '../emoji-picker';
import { UserAvatar } from '../UserAvatar';
import { authUserIsn } from '../../authUserIsn';
import { AjaxButton } from '../ajax';
import { ISN } from '../../types';
import { BaseEmoji } from 'emoji-mart';
import { FileForm } from './files-form';
import Editor from 'rich-markdown-editor';
import { editorDictionary } from './editor-dict';
import { FileEntry } from '../../hooks/useFileReader';
import { PollForm } from './poll-form';
import { If } from '../if';

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
  icon: React.ReactNode;

  onFilesSelected(files: FileList): void;

  accept: string;
  multiple?: boolean;
}

export function FileButton({ children, icon, onFilesSelected, accept, multiple = true }: FileButtonProps) {
  let uploadRef = React.createRef<HTMLInputElement>();

  return <span>
        <input type='file'
               ref={uploadRef}
               hidden
               multiple={multiple}
               accept={accept}
               onChange={(e) => {
                 if (!e.target.files) {
                   return;
                 }

                 if (e.target.files.length === 0) {
                   return;
                 }

                 onFilesSelected(e.target.files);
               }} />
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
  return <Tooltip placement='bottom'
                  title='Черновик публикации сохраняется в браузере. Вы сможете вернуться к нему в любой момент.'>
    <QuestionCircleOutlined />
  </Tooltip>;
}

export function AddPostForm({ onAddPost }: AddPostFormProps) {
  let maxLength = 2000;
  let [showPollForm, setShowPollForm] = useLocalStorage('showPollForm', false);
  let [postText, setPostText] = useLocalStorage('postText', '');
  let [pollData, setPollData] = useState<PollData | null>(null);
  // let [, setDraftSaved] = useState(false);
  // let [, setTextFieldHeight] = useLocalStorage<number>('textFieldHeight', 55);

  let [images, setImages] = useState<FileEntry[]>([]);
  let [videos, setVideos] = useState<FileEntry[]>([]);
  let [docs, setDocs] = useState<FileEntry[]>([]);

  let showPublishButton = !!postText.replace(/^[\s\\]+/, '').replace(/[\s\\]+$/, '');

  let postData: any = {
    postText,
    poll: 0,
    isn: authUserIsn()
  };

  if (pollData) {
    postData.poll = 1;
    postData.question = pollData.question;
    postData.answers = pollData.answers;
  }

  let publishBtn = <AjaxButton<AddPostData, AddPostData>
    method='POST'
    url='/news/addPost/beta'
    data={postData}
    files={{
      'postImages[]': images,
      'postVideos[]': videos,
      'postDocuments[]': docs
    }}
    dataType="formData"
    icon={<SendOutlined />}
    disabled={!showPublishButton}
    type='default'
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

            <Divider type='vertical' />

            <PublishInfo />
          </Typography.Title>
        </Col>
        <Col offset={8} md={4}>
          {/*{draftSaved ? <span>Черновик сохранён </span> : null}*/}
        </Col>
      </Row>
      <Row style={{ backgroundColor: 'white' }}>
        <Col md={4} className='d-flex justify-content-center align-items-center'>
          <UserAvatar isn={authUserIsn()} />
        </Col>
        <Col md={19}>
          <Editor
            defaultValue={postText}
            maxLength={maxLength}
            dictionary={editorDictionary}
            onChange={(e: any) => {
              let value = e();
              setPostText(value);
              return value;
            }}
            style={{
              minHeight: '150px',
              justifyContent: 'inherit'
            }}
            placeholder='Что у вас нового?'
          />
        </Col>
        <Col md={1}>
          <EmojiPicker
            onSelect={(data) => {
              setPostText(postText + (data as BaseEmoji).native);
            }} />
        </Col>
      </Row>
      <Divider />
      <Row>
        <Col md={12}>
          <FileForm
            onImagesUpdated={(files) => {
              setImages(files);
            }}
            onVideosUpdated={(files) => {
              setVideos(files);
            }}
            onDocsUpdated={(files) => {
              setDocs(files);
            }}
          />
        </Col>
        <Col md={6}>
          <Button
            onClick={() => {
              setShowPollForm(!showPollForm);
            }}
            icon={<BarChartOutlined />}
            type={showPollForm ? 'primary' : 'default'}>Опрос</Button>
        </Col>
        <Col md={6}>
          {publishBtn}
        </Col>
      </Row>
      <Row>
        <Col md={24}>
          <If condition={showPollForm}>
            <PollForm onUpdatePoll={({ question, answers }) => {
              setPollData({
                question,
                answers
              });
            }} />
          </If>
        </Col>
      </Row>
    </Col>
  </Row>;
}
