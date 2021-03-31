import {Carousel, Col, Image, Row} from 'antd';
import React from 'react';
import {PostEntity} from '../ajax/types';

interface PostImagesProps {
    post: PostEntity;
}

export function PostImages({post}: PostImagesProps) {
    let images = post.image || [];
    return <Row align="middle" justify="space-around" >
        {images.map((image, index) =>
            <Col md={8} key={index} order={4}>
                <Image src={image} key={index} />
            </Col>)}
    </Row>
}
