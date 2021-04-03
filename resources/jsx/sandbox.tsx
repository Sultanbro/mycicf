import React from 'react';
import {Posts} from "./components/news/posts";
import {Col, Image, Row, Tooltip} from "antd";
import {Birthdays} from "./components/birthdays/birthdays";
import {PostComment} from "./components/news/post-comment";
import {PostCommentEntity} from "./components/ajax/types";
import {ColleagueData} from "./components/colleague-data";
import {authUserIsn} from "./authUserIsn";
import {UserName} from "./UserName";
import {FileImageOutlined, PlayCircleOutlined} from '@ant-design/icons';
import {FileButton} from './components/news/add-post-form';
import {useFileReader} from './hooks/useFileReader';

export function Sandbox({}: any) {
    let [images, addImage]: any[] = useFileReader();
    let [videos, addVideo]: any[] = useFileReader();

    return <div>
        {/*<ColleagueData isn={authUserIsn()} />*/}

        {/*<Posts />*/}

        <Row>
            {images.map((file: any, index: number) => {
                return <Col md={3} key={index}>
                    <Image src={file} width="100%" key={index}/>
                </Col>
            })}
        </Row>

        <Row>
            {videos.map((file: any, index: number) => {
                return <Col md={3} key={index}>
                    <Image src={file} width="100%" key={index}/>
                </Col>
            })}
        </Row>

        <FileButton
            icon={<FileImageOutlined />}
            accept="image/*"
            onFilesSelected={(files) => {
                if (!files) {
                    return;
                }
                addImage(files[0])
            }}>
            <Tooltip title="Не работает">
                Фото
            </Tooltip>
        </FileButton>

        <FileButton
            icon={<PlayCircleOutlined />}
            accept="image/*"
            onFilesSelected={(files) => {
                if (!files) {
                    return;
                }
                addVideo(files[0])
            }}>
            <Tooltip title="Не работает">
                Видео
            </Tooltip>
        </FileButton>

        {/*<Birthdays />*/}

        {/*<Centcoins />*/}

        {/*<CentcoinOperationsList />*/}

        {/*<CoordinationList />*/}

        {/*<UserMenu />*/}

        {/*<BossPosts />*/}

        {/*<Dossier />*/}

        {/*<Sidebar />*/}

        {/*<UserName isn={'5565'} username={'Developer'} />*/}
    </div>
}
