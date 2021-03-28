import React, {Ref, useState} from 'react';
import {Button} from 'antd';

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
        <Button type="link"
                block
                onClick={() => {
                    console.log(ref);
                    if (!maximized) {
                        setMaxHeight('1000px');
                    } else {
                        setMaxHeight(defaultMaxHeight);
                    }
                }}>
            { maximized ? 'Свернуть' : 'Показать больше' }
        </Button>
    </div>
}
