import React from "react";
import { Button, Col, Menu, Row } from "antd";

export interface SidebarProps {}

/**
 * TODO See \resources\views\layouts\sidebar.blade.php
 *
 * @constructor
 */
export function Sidebar({}: SidebarProps) {
  return (
    <Row>
      <Col md={24}>
        <Row>
          <Col md={24}></Col>
        </Row>
        <Row>
          <Col md={24}>
            <Menu
              style={{ width: 256 }}
              defaultSelectedKeys={[]}
              defaultOpenKeys={["sub1"]}
              mode="inline"
            >
              <Menu.Item
                key="1"
                icon={
                  <i
                    className="far fa-clipboard"
                    style={{ color: "#4267b2" }}
                  />
                }
              >
                <Button type="link" href="/dossier">
                  Обо мне
                </Button>
              </Menu.Item>
              <Menu.Item
                key="2"
                icon={
                  <i className="fas fa-users" style={{ color: "#4267b2" }} />
                }
              >
                <Button type="link" href="/dossier">
                  Мои коллеги
                </Button>
              </Menu.Item>
              <Menu.Item
                key="3"
                icon={
                  <i
                    className="far fa-thumbs-up"
                    style={{ color: "#4267b2" }}
                  />
                }
              >
                <Button type="link" href="/dossier">
                  Согласование ()
                </Button>
              </Menu.Item>
              <Menu.Item
                key="4"
                icon={
                  <img src="/images/centcoin-fa.png" style={{ width: 20 }} />
                }
              >
                <Button type="link" href="/dossier">
                  Сенткоины
                </Button>
              </Menu.Item>
              <Menu.Item
                key="5"
                icon={
                  <i
                    className="fa fa-car"
                    aria-hidden="true"
                    style={{ color: "#4267b2" }}
                  />
                }
              >
                <Button type="link" href="/dossier">
                  Предстраховой осмотр
                </Button>
              </Menu.Item>
              <Menu.Item
                key="6"
                icon={
                  <i
                    className="fas fa-graduation-cap"
                    style={{ color: "#4267b2" }}
                  />
                }
              >
                <Button type="link" href="/dossier">
                  Центр знаний
                </Button>
              </Menu.Item>
              <Menu.Item
                key="7"
                icon={
                  <i
                    className="fa fa-calendar"
                    aria-hidden="true"
                    style={{ color: "#4267b2" }}
                  />
                }
              >
                <Button type="link" href="/dossier">
                  На переговоры!
                </Button>
              </Menu.Item>
            </Menu>
          </Col>
        </Row>
      </Col>
    </Row>
  );
}
