import React from 'react';
import {Button, Col, Divider, List, Row, Table} from 'antd';
import {If} from '../if';
import {FileEntry, useFileReader} from '../../hooks/useFileReader';
import {DeleteOutlined, FileImageOutlined, FileOutlined, PlayCircleOutlined} from '@ant-design/icons';
import {FileButton} from './add-post-form';

interface FileFormProps {
    onImagesUpdated: (entries: FileEntry[]) => void;
    onVideosUpdated: (entries: FileEntry[]) => void;
    onDocsUpdated: (entries: FileEntry[]) => void;
}

export function FileForm({ onImagesUpdated, onVideosUpdated, onDocsUpdated }: FileFormProps) {
    let [images, addImages] = useFileReader({autoRead: true});
    let [videos, addVideos] = useFileReader();
    let [docs, addDocs] = useFileReader();

    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}> <FileButton
                    icon={<FileImageOutlined />}
                    accept="image/*"
                    onFilesSelected={(files) => {
                        if (!files) {
                            return;
                        }

                        if (!files.length) {
                            return;
                        }

                        addImages(...files as any);
                        onImagesUpdated(images);
                    }}>
                    Фото
                </FileButton>

                    <Divider type="vertical" />

                    <FileButton
                        icon={<PlayCircleOutlined />}
                        accept="video/*"
                        onFilesSelected={(files) => {
                            addVideos(...files as any);
                            onVideosUpdated(videos);
                        }}>
                        Видео
                    </FileButton>

                    <Divider type="vertical" />

                    <FileButton
                        icon={<FileOutlined />}
                        accept="image/*"
                        onFilesSelected={(files) => {
                            if (!files) {
                                return;
                            }

                            if (!files.length) {
                                return;
                            }

                            addDocs(...files as any);
                            onDocsUpdated(docs);
                        }}>
                        Файл
                    </FileButton>
                </Col>
            </Row>

            <Row>
                {images.map((entry, index) => {
                    return <Col md={6}
                                key={index}
                                className="d-flex justify-content-center align-items-center">
                        <div style={{
                            width: 200,
                            height: 200,
                            backgroundImage: `url('${entry.dataUrl as string}')`,
                            backgroundPosition: 'center center',
                            backgroundRepeat: 'no-repeat',
                            backgroundSize: 'contain'
                        }}>
                        </div>
                    </Col>;
                })}
            </Row>

            <If condition={videos.length > 0}>
                <Table<FileEntry>
                    pagination={false}
                    showHeader={false}
                    columns={[
                        {
                            key: 'icon',
                            dataIndex: 'icon',
                            render: () =>
                                <PlayCircleOutlined />
                        },
                        {
                            key: 'fileName',
                            dataIndex: 'fileName',
                            render: (e, entry: FileEntry) =>
                                entry.file.name // entry.file.name
                        },
                        {
                            key: 'delete',
                            dataIndex: 'delete',
                            render: () =>
                                <Button icon={<DeleteOutlined />} type="text" />
                        }
                    ]}
                    dataSource={videos}
                />
            </If>

            <If condition={videos.length > 0}>
                <Row>
                    <Col md={24}>
                        <List<FileEntry>
                            dataSource={docs}
                            renderItem={(entry, index) => {
                                return <List.Item key={index}>
                                    <Row>
                                        <Col md={24}>
                                            <Row>
                                                <Col md={2}><FileOutlined /></Col>
                                                <Col md={20}>{entry.file.name}</Col>
                                                <Col md={2}><DeleteOutlined /></Col>
                                            </Row>
                                        </Col>
                                    </Row>
                                </List.Item>;
                            }} />
                    </Col>
                </Row>
            </If>
        </Col>
    </Row>;
}
