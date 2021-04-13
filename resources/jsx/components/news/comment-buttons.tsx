import { Button, Col, Row } from "antd";
import { CloseOutlined, EditOutlined } from "@ant-design/icons";
import React from "react";
import { PostCommentEntity } from "../ajax/types";
import { AjaxButton } from "../ajax";

export interface CommentMenuProps {
  comment: PostCommentEntity;
  onCommentDeleted: (commentId: number) => void;
  onShowEditForm: (commentId: number) => void;
}

export function CommentButtons({
  comment,
  onCommentDeleted,
  onShowEditForm,
}: CommentMenuProps) {
  return (
    <Row>
      <Col md={4}>
        <Button
          type="link"
          icon={<EditOutlined />}
          onClick={() => {
            onShowEditForm(comment.commentId);
          }}
        />
      </Col>

      <Col md={4}>
        <AjaxButton<{ commentId: number }, { success: true }>
          url="/news/comments/deleteComment"
          method="POST"
          block
          data={{ commentId: comment.commentId }}
          type="link"
          icon={<CloseOutlined />}
          onSuccess={(res) => {
            if (res.data.success) {
              onCommentDeleted(comment.commentId);
            }
          }}
        >
          a
        </AjaxButton>
      </Col>
    </Row>
  );
}
