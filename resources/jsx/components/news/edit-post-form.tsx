import React, { useState } from "react";
import { Button, Col, Divider, Row } from "antd";
import { SendOutlined } from "@ant-design/icons";
import { PostEntity } from "../ajax/types";
import { AjaxButton } from "../ajax";
import Editor from "rich-markdown-editor";
import { editorDictionary } from "./editor-dict";

export interface EditPostFormProps {
  post: PostEntity;
  onCancel: () => void;
  onSaved: (post: PostEntity) => void;
}

export function EditPostForm({ post, onCancel, onSaved }: EditPostFormProps) {
  let [postText, setPostText] = useState(post.postText);
  return (
    <Row>
      <Col md={24}>
        <Row>
          <Col md={24}>
            <Editor
              defaultValue={postText}
              maxLength={2000}
              dictionary={editorDictionary}
              onChange={(e) => {
                let value = e();
                setPostText(value);
                return value;
              }}
              style={{
                minHeight: "150px",
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
          <Col offset={12}>
            <AjaxButton<
              { postId: number; postText: string },
              { edited: boolean; success: boolean }
            >
              type="default"
              url="/news/my/editPost"
              data={{ postId: post.postId, postText: postText }}
              method="POST"
              icon={<SendOutlined />}
              onSuccess={(res) => {
                post.postText = postText;
                if (res.data.edited) {
                  onSaved(post);
                }
              }}
            >
              Отправить
            </AjaxButton>
          </Col>
          <Col offset={1}>
            <Divider type="vertical" />
          </Col>
          <Col>
            <Button
              onClick={() => {
                onCancel();
              }}
              color="red"
            >
              Отмена
            </Button>
          </Col>
        </Row>
      </Col>
    </Row>
  );
}
