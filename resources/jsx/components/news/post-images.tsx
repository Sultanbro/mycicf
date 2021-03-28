import {PostEntity} from '../../ajax';
import {Carousel, Col, Image, Row} from 'antd';
import React from 'react';

interface PostImagesProps {
    post: PostEntity;
}

export function PostImages({post}: PostImagesProps) {
    let images = post.image || [];
    return <Carousel>
        {images.map((image, index) => {
            return <Row justify="center" align="middle">
                <Col md={12}>
                    <Image src={image} key={index} />
                </Col>
            </Row>
        })}
    </Carousel>
}
