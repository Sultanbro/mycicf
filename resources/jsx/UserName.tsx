import { Button, Card, Col, Divider, Dropdown, Row, Typography } from "antd";
import React from "react";
import { UserAvatar } from "./components/UserAvatar";
import { Ajax } from "./components/ajax";
import { ISN } from "./types";

let dossierUrl = (isn: ISN) => `/colleagues/${isn}/dossier`;

export interface UserNameProps {
  isn: ISN;
  username: string;
}

export function UserName({ isn, username }: UserNameProps) {
  return (
    <Dropdown overlay={<Info isn={isn} username={username} />}>
      <a href={dossierUrl(isn)}>{username}</a>
    </Dropdown>
  );
}

interface InfoProps {
  isn: ISN;
  username: string;
}

interface GetColleagueDataResponse {
  response: {
    Birthday: string;
    Duty: string;
  };
}

function Info({ isn, username }: InfoProps) {
  return (
    <Card style={{ width: 600, boxShadow: "0 0 8px #0000003b" }}>
      <Ajax.POST<GetColleagueDataResponse>
        url="/getColleagueData"
        data={{ isn }}
        cache
      >
        {({ response }) => {
          return (
            <Row>
              <Col md={24}>
                <Row>
                  <Col md={6}>
                    <UserAvatar isn={isn} size={128} shape="square" />
                  </Col>
                  <Col md={18}>
                    <div>
                      <Typography.Title level={4}>{username}</Typography.Title>
                      <Typography.Text>
                        <p>
                          <b>ISN: </b>
                          {isn}
                        </p>
                      </Typography.Text>
                      <Typography.Text>
                        <p>
                          <b>Дата рождения: </b>
                          {response.data.response.Birthday}
                        </p>
                      </Typography.Text>
                      <Typography.Text>
                        <p>
                          <b>Подразделение: </b>
                          {response.data.response.Duty}
                        </p>
                      </Typography.Text>
                    </div>
                  </Col>
                </Row>
                <Row>
                  <Col md={24}>
                    <Divider />
                    <Button
                      href={dossierUrl(isn)}
                      icon={<i className="far fa-clipboard" />}
                    >
                      Досье
                    </Button>
                  </Col>
                </Row>
              </Col>
            </Row>
          );
        }}
      </Ajax.POST>
    </Card>
  );
}
