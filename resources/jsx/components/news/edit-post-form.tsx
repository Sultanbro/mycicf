import React, {useState} from 'react';
import {Button, Col, Divider, Input, Row} from 'antd';
import {SendOutlined} from "@ant-design/icons";
import {PostEntity} from '../ajax/types';
import {AjaxButton} from '../ajax';

export interface EditPostFormProps {
    post: PostEntity;
    onCancel: () => void;
    onSaved: (post: PostEntity) => void;
}

export function EditPostForm({post, onCancel, onSaved}: EditPostFormProps) {
    let [postText, setPostText] = useState(post.postText);
    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <Input.TextArea value={postText}
                                    rows={5}
                                    bordered={false}
                                    maxLength={2000}
                                    style={{padding: '14px', backgroundColor: 'rgba(0, 0, 0, 0.03)'}}
                                    onChange={(e) => {
                                        setPostText(e.target.value);
                                    }}
                    />
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <Divider />
                </Col>
            </Row>
            <Row>
                <Col offset={16}>
                    <AjaxButton<{ postId: number, postText: string }, { edited: boolean, success: boolean }>
                        type="default"
                        url="/news/my/editPost"
                        data={{postId: post.postId, postText: postText}}
                        method="POST"
                        icon={<SendOutlined />}
                        onSuccess={(res) => {
                            post.postText = postText;
                            if (res.data.edited) {
                                onSaved(post);
                            }
                        }}>
                        Отправить
                    </AjaxButton>
                </Col>
                <Col>
                    <Divider type="vertical" />
                </Col>
                <Col>
                    <Button
                        onClick={() => {
                            onCancel();
                        }}
                        color="red">
                        Отмена
                    </Button>
                </Col>
            </Row>
        </Col>
    </Row>;
}
