import React from "react";
import { FileForm } from "./components/news/files-form";
import { Birthdays } from "./components/birthdays/birthdays";
import { Col, Row } from "antd";
import { AddPostForm } from "./components/news/add-post-form";
import { CoordinationList } from "./components/coordination/list";
import { UserMenu } from "./components/usermenu";
import { Colleagues } from "./components/colleagues/colleagues";

export function Sandbox({}: any) {
  return (
    <Row>
      <Col md={24}>
        {/*<ColleagueData isn={authUserIsn()} />*/}

        {/*<FileForm />*/}

        {/*<Row>
                <Col md={24}>
                    <AddPostForm onAddPost={() => {}} />
                </Col>
            </Row>*/}

        {/*<Centcoins />*/}

        {/*<CentcoinOperationsList />*/}

        {/*<CoordinationList />*/}

        {/*<UserMenu />*/}

        {/*<BossPosts />*/}

        {/*<Dossier />*/}

        {/*<Sidebar />*/}

        {/*<UserName isn={'5565'} username={'Developer'} />*/}

        <Colleagues />
      </Col>
    </Row>
  );
}
