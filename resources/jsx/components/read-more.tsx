import React, {useState} from 'react';
import {Button} from 'antd';

export interface ReadMoreProps {
    text: string;
    limit?: number;
}

// TODO
export function ReadMore({text, limit = 350}: ReadMoreProps) {
    let [expanded, setExpanded] = useState(false);
    let length = text.length;
    let limitedText = text;
    if (length >= limit) {
        limitedText = text.substr(0, limit);
    }

    let showButton = length >= limit && expanded;

    return <div>
        {text}

        {!showButton ? <Button type="link"
                             onClick={() => {
                                 setExpanded(true);
                             }}>
            Показать больше
        </Button> : null}
    </div>
}
