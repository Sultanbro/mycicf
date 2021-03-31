import React, {useState} from 'react';
import {Button} from 'antd';

export interface ReadMoreProps {
    text: string;
    limit?: number;
}

// TODO
export function ReadMore({text, limit = 3}: ReadMoreProps) {
    try {
        let [expanded, setExpanded] = useState(false);
        let paragraphs = text.split(/\n\n/);
        let limitedText = paragraphs;

        if (limitedText.length >= limit && !expanded) {
            limitedText = paragraphs.slice(0, limit);
        }

        let showButton = limitedText.length >= limit;

        if (expanded) {
            showButton = false;
        }

        return <div>
            {limitedText.map((paragraph, i) => <p key={i}>{paragraph}</p>)}

            {showButton ? <div>
                <Button type="dashed"
                        block
                        style={{padding: 0}}
                        onClick={() => {
                            setExpanded(true);
                        }}>
                    Показать больше
                </Button>
            </div> : null}
        </div>
    } catch(e) {
        return <div>
            {text}
        </div>
    }
}
