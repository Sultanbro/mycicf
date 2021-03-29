import React, {useState} from 'react';
import {Button} from 'antd';

export interface ReadMoreProps {
    text: string;
}

export function ReadMore({text}: ReadMoreProps) {
    let [expanded, setExpanded] = useState(false);

    if (!expanded) {
        text = text.substr(0, 350);
    }

    return <div>
        {text}

        {!expanded ? <Button type="link"
                             onClick={() => {
                                 setExpanded(true);
                             }}>
            Показать больше
        </Button> : null}
    </div>
}
