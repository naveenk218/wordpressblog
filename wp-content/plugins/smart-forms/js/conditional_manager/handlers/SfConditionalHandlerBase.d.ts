declare abstract class SfConditionalHandlerBase {
    PreviousActionWas: number;
    Options: any;
    IsNew: boolean;
    Id: number;
    static ConditionId: number;
    Condition: any;
    Form: any;
    _remote: any;
    Container: JQuery;
    constructor(options: any);
    abstract GetConditionalSteps(): any;
    abstract Initialize(form: any, data: any): any;
    abstract ExecuteTrueAction(): any;
    abstract ExecuteFalseAction(form: any): any;
    abstract ExecutingPromise(): any;
    GetOptionsToSave(): any;
    SubscribeCondition(condition: any, initialData: any): void;
    GetRemote(): any;
    ProcessCondition(data: any): Promise<{
        ActionType: string;
        Execute: () => void;
    }>;
    private ProcessResult;
}
