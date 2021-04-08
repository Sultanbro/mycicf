import React from 'react';
import {Col, Image, Row} from 'antd';
import {Ajax, AjaxProps} from '../ajax';
import {PostEntity} from '../ajax/types';
import {Post} from './post';

interface BossPostsAjaxProps extends AjaxProps<PostEntity[]> {
    lastIndex?: number;
}

export function BossPostsAjax({lastIndex, children}: BossPostsAjaxProps) {
    return <Ajax.POST<PostEntity> url="/boss-news/getBossPosts" data={{lastIndex}}>
        {({response, refetch, callback}: any) => {
            return children({response, callback, refetch});
        }}
    </Ajax.POST>;
}

export function BossPosts() {
    return <Row>
        <Col md={24}>
            <Row>
                <Col md={24}>
                    <div className="mb-3">
                        <div className="d-flex bg-white p-4 rounded">
                            <div className="mr-3 w-25">
                                <Image src="/images/boss-says.jpg" alt="" />
                            </div>
                            <div className="w-75">
                                <h5><b>Бейбит Турысбеков</b></h5>
                                <p>Председатель Правления.</p>
                                <p>Добро пожаловать в мой личный блог!</p>
                                <p>В любой работе я предпочитаю действовать по определенной схеме. Все мои посты – это
                                    часть
                                    большого плана, идеи которого я хочу донести до каждого сотрудника нашей
                                    Компании.</p>
                                <p>Удобно, когда все это будет собрано в специальном разделе. Мой блог – о компании, о
                                    бизнесе,
                                    о цифрах, о стратегии развития и внедрении новых тенденций. Конечно, тут будет
                                    возникать
                                    множество вопросов: к чему будем стремиться, что происходит на рынке страхования,
                                    как
                                    поднять эффективность продавцов и многие другие. Для этого и блог, в каждом посте
                                    будет
                                    заключен ответ.</p>
                                <p>Найдите в этом блоге для себя нужное, полезное и мотивирующее людей, и реализовывайте
                                    свой
                                    собственный потенциал в стенах нашей Компании Centras Insurance!</p>
                                <p>И не забывайте ставить лайки! </p>
                            </div>
                        </div>
                    </div>
                </Col>
            </Row>
            <Row>
                <Col md={24}>
                    <BossPostsAjax>
                        {({response}) => {
                            return response.data.map((post, index) => {
                                return <Post post={post} key={index} />;
                            });
                        }}
                    </BossPostsAjax>
                </Col>
            </Row>
        </Col>
    </Row>;
}
