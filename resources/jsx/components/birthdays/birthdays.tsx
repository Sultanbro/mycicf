import React, { useState } from "react";
import { LeftOutlined, RightOutlined } from "@ant-design/icons";
import { Col, Row, Typography, Button, Divider, Spin } from "antd";
import { UserAvatar } from "../UserAvatar";
import { Ajax } from "../ajax";
import { ISN } from "../../types";
import { UserName } from "../../UserName";

const monthNames: { [index: number]: string } = {
  1: "Январь",
  2: "Февраль",
  3: "Март",
  4: "Апрель",
  5: "Май",
  6: "Июнь",
  7: "Июль",
  8: "Август",
  9: "Сентябрь",
  10: "Октябрь",
  11: "Ноябрь",
  12: "Декабрь",
};

interface BirthdayEntry {
  id: number;
  birthday: string;
  kias_id: ISN;
  fullname: string;
}

interface BirthdaysResponse {
  [birthday: string]: BirthdayEntry[];
}

function Entry({ entry }: { entry: BirthdayEntry }) {
  return (
    <Row justify="center" align="middle">
      <Col md={24}>
        <Row justify="center" align="middle">
          <Col
            md={6}
            className="jc-center d-flex width50 events-window-size relative"
          >
            <UserAvatar isn={entry.kias_id} shape="square" size={100} />
            <img
              alt=""
              src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif"
              className="absolute width100 height100"
            />
          </Col>
        </Row>
        <Row>
          <Col md={24} className="text-center">
            <UserName isn={entry.kias_id} username={entry.fullname} />
          </Col>
        </Row>
      </Col>
      <Divider />
    </Row>
  );
}

export interface ElProps {
  data: BirthdaysResponse;
}

export function El({ data }: ElProps) {
  let [index, setIndex] = useState(0);
  let keys = Object.keys(data);
  let date = keys[index];
  let first = index === 0;
  let last = index === keys.length - 1;

  console.log(index, date);

  if (!date) {
    setIndex(0);
  }

  let users = data[date];

  let [day, month]: number[] = date.split("-").map((el) => parseInt(el));

  return (
    <Row>
      <Col md={24}>
        <Row>
          <Col md={24}>
            <Typography.Title level={5}>
              Ближайшие дни рождения
            </Typography.Title>
          </Col>
        </Row>
        <Row>
          <Col md={4}>
            <Button
              style={{ height: "184px" }}
              type="text"
              onClick={() => {
                setIndex(index - 1);
              }}
              disabled={first}
            >
              <LeftOutlined />
            </Button>
          </Col>
          <Col md={16}>
            <Typography.Title level={4} className="text-center">
              {day} {monthNames[month]}
            </Typography.Title>
            {users.map((entry, index) => (
              <Entry entry={entry} key={index} />
            ))}
          </Col>
          <Col md={4}>
            <Button
              style={{ height: "184px" }}
              type="text"
              onClick={() => {
                setIndex(index + 1);
              }}
              disabled={last}
            >
              <RightOutlined />
            </Button>
          </Col>
        </Row>
      </Col>
    </Row>
  );
}

export function Birthdays() {
  return (
    <Ajax.GET<BirthdaysResponse>
      url="/getBirthdays2"
      loading={<Spin style={{ display: "none" }} />}
    >
      {({ response }) => <El data={response.data} />}
    </Ajax.GET>
  );
}
