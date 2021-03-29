import React, {Ref, useState} from 'react';
import {Button} from 'antd';
import {DownOutlined, UpOutlined} from '@ant-design/icons';

export function ReadMore({children, defaultMaxHeight = '100px'}: any) {
    return children;


    let [maxHeight, setMaxHeight] = useState(defaultMaxHeight);
    let [div, setDiv] = useState<HTMLDivElement | null>(null);
    let style: React.CSSProperties = {
        maxHeight,
        overflow: 'hidden',
        transition: 'max-height 500ms ease-out'
    };
    return <div>
        <div style={style} ref={(el) => setDiv(el)}>
            {children}
        </div>

        <Button type="dashed"
                        block
                        icon={
                            (div && div.style.maxHeight !== '1000px') ?
                                <UpOutlined/> :
                                <DownOutlined/>
                        }
                        onClick={() => {
                            if (!(div && div.style.maxHeight === '1000px')) {
                                setMaxHeight('1000px');
                            } else {
                                setMaxHeight(defaultMaxHeight);
                            }
                        }}>
            {
                (div && div.style.maxHeight === '1000px') ?
                    <span>Свернуть</span> :
                    <span>Показать больше</span>
            }
        </Button>

    </div>
}
