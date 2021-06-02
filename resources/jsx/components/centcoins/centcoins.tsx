import React from "react";
import { Col, Row, Typography } from "antd";
import { Ajax } from "../ajax";
import { authUserIsn } from "../../authUserIsn";

export interface CentcoinsProps {}

export function Centcoins({}: CentcoinsProps) {
  return (
    <Ajax.POST<number> url="/getCentcoins" data={{ isn: authUserIsn() }}>
      {({ response }) => {
        return (
          <Row className="centcoins-bg-blue color-white">
            <Col>
              <Typography.Title>Сенткоины</Typography.Title>

              <span className="centcoins-value">{response.data}</span>
              <span>
                <img
                  alt="Centcoin Logo"
                  src="/images/centcoin-logo.png"
                  className="centcoin"
                />
              </span>
            </Col>
          </Row>
        );
      }}
    </Ajax.POST>
  );
}