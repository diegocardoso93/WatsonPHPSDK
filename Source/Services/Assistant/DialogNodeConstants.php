<?php

namespace WatsonSDK\Services\Assistant;

/** Constants for the `createDialogNode` and `updateDialogNode` operations. */
abstract class DialogNodeConstants {

    /** How the dialog node is processed. */
    const NodeType = [
        'STANDARD' => 'standard',
        'EVENT_HANDLER' => 'event_handler',
        'FRAME' => 'frame',
        'SLOT' => 'slot',
        'RESPONSE_CONDITION' => 'response_condition',
        'FOLDER' => 'folder'
    ];
    
    /** How an `event_handler` node is processed. */
    const EventName = [
        'FOCUS' => 'focus',
        'INPUT' => 'input',
        'FILLED' => 'filled',
        'VALIDATE' => 'validate',
        'FILLED_MULTIPLE' => 'filled_multiple',
        'GENERIC' => 'generic',
        'NOMATCH' => 'nomatch',
        'NOMATCH_RESPONSES_DEPLETED' => 'nomatch_responses_depleted'
    ];
    
    /** Whether this to[params.headers] -level dialog node can be digressed into. */
    const DigressIn = [
        'NOT_AVAILABLE' => 'not_available',
        'RETURNS' => 'returns',
        'DOES_NOT_RETURN' => 'does_not_return'
    ];
    
    /** Whether this dialog node can be returned to after a digression. */
    const DigressOut = [
        'RETURNING' => 'allow_returning',
        'ALL' => 'allow_all',
        'ALL_NEVER_RETURN' => 'allow_all_never_return'
    ];
    
    /** Whether the user can digress to to[params.headers] -level nodes while filling out slots. */
    const DigressOutSlots = [
        'NOT_ALLOWED' => 'not_allowed',
        'ALLOW_RETURNING' => 'allow_returning',
        'ALLOW_ALL' => 'allow_all'
    ];
    
}
