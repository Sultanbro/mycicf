import {Ajax, PostEntity} from '../../ajax';
import React, {useState} from 'react';
import {Button, Col, Divider, Input, Row} from 'antd';
import {SendOutlined} from "@ant-design/icons";

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
                                    rows={7}
                                    onChange={(e) => {
                                        setPostText(e.target.value);
                                    }}
                    />
                </Col>
            </Row>
            <Row>
                <Col offset={14}>
                    <Ajax.Button<{ postId: number, postText: string }, { edited: boolean, success: boolean }>
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
                    </Ajax.Button>
                </Col>
                <Col>
                    <Divider type="vertical" />
                </Col>
                <Col>
                    <Button onClick={() => {
                        onCancel();
                    }}>
                        Отмена
                    </Button>
                </Col>
            </Row>
        </Col>
    </Row>
}
