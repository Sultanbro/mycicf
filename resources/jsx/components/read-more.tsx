import React, {Ref, useState} from 'react';
import {Button} from 'antd';
import {DownOutlined, UpOutlined} from '@ant-design/icons';

export function ReadMore({children, defaultMaxHeight = '100px'}: any) {
    let [maxHeight, setMaxHeight] = useState(defaultMaxHeight);
    let ref: Ref<any> = null;
    let style: React.CSSProperties = {
        maxHeight,
        overflow: 'hidden',
        transition: 'max-height 500ms ease-out'
    };
    let maximized = maxHeight === '1000px';
    return <div ref={ref}>
        <div style={style}>
            {children}
        </div>
        <Button type="dashed"
                block
                icon={
                    maximized ?
                        <UpOutlined /> :
                        <DownOutlined />
                }
                onClick={() => {
                    console.log(ref);
                    if (!maximized) {
                        setMaxHeight('1000px');
                    } else {
                        setMaxHeight(defaultMaxHeight);
                    }
                }}>
            {
                maximized ?
                <span>Свернуть</span> :
                <span>Показать больше</span>
            }
        </Button>
    </div>
}
