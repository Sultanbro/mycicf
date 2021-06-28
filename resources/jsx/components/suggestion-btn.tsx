import React, { useState } from "react";
import { CheckOutlined, UserOutlined } from "@ant-design/icons";
import {
  Alert,
  Button,
  Col,
  Divider,
  Form,
  Input,
  Modal,
  notification,
  Row,
} from "antd";
import { authUserName } from "../authUserName";
import { authUserIsn } from "../authUserIsn";
import { createUseLocalStorage } from "../hooks/useLocalStorage";
import { AjaxButton } from "./ajax";

export interface SuggestionBtnProps {}

export interface SuggestionModalProps {
  visible: boolean;

  setVisible(visible: boolean): void;
}

let useLocalStorage = createUseLocalStorage("suggestion");

function SuggestionModal({ visible, setVisible }: SuggestionModalProps) {
  const [content, setContent] = useLocalStorage("content", "");
  let alert = (
    <Alert
      message={
        <span>
          <b>Примечание:</b> Черновик Вашего обращения сохраняется в браузере.
          Вы сможете вернуться к нему в любой момент.
        </span>
      }
      type="info"
    />
  );

  return (
    <Modal
      title="Оставить отзыв"
      visible={visible}
      footer={null}
      onCancel={() => {
        setVisible(false);
      }}
    >
      <Form
        initialValues={{
          username: `${authUserName()} (ISN: ${authUserIsn()})`,
          content,
        }}
      >
        <Form.Item
          name="username"
          rules={[{ required: true, message: "Please input your Username!" }]}
        >
          <Input
            prefix={<UserOutlined className="site-form-item-icon" />}
            readOnly
            placeholder="Ваше имя"
          />
        </Form.Item>
        <Form.Item name="content" rules={[{ required: true, message: "" }]}>
          <Input.TextArea
            placeholder="Обращение"
            rows={15}
            onChange={(e) => {
              setContent(e.target.value);
            }}
          />
        </Form.Item>
      </Form>

      {alert}

      <Divider />

      <AjaxButton
        url="/news/addSuggestion"
        method="POST"
        type="primary"
        data={{}}
        block
        title="Не работает"
        disabled
        onSuccess={() => {
          setContent("");
          notification.info({
            message: "Спасибо за обращение!",
          });
        }}
      >
        Отправить
      </AjaxButton>
    </Modal>
  );
}

export function SuggestionBtn({}: SuggestionBtnProps) {
  const [isModalVisible, setIsModalVisible] = useState(false);
  return (
    <Row>
      <Col md={12}>
        <Button
          icon={<CheckOutlined />}
          onClick={() => {
            setIsModalVisible(true);
          }}
        >
          Оставить отзыв
        </Button>

        <SuggestionModal
          visible={isModalVisible}
          setVisible={(visible) => {
            setIsModalVisible(visible);
          }}
        />
      </Col>
    </Row>
  );
}