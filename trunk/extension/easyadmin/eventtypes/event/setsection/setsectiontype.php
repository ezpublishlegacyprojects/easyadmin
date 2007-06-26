<?php

define( 'EZ_WORKFLOW_TYPE_SETSECTION_ID', 'setsection' );
// include_once('kernel/classes/ezworkflowtype.php');
// include_once('lib/ezutils/classes/ezoperationhandler.php');

class setSectionType extends eZWorkflowEventType
{
    function setSectionType()
    {
        $this->eZWorkflowEventType
                ( EZ_WORKFLOW_TYPE_SETSECTION_ID, 
                        'Set section' );
	$this->setTriggerTypes( array( 'content' => array( 'publish' => array( 'before','after' ) ) ) );
	//for some reason, on a 3.6, it doesn't work on a before trigger, only on an after (works fine on 3.7 ?)
    }

    function execute( &$process, &$event )
    {
       include_once( 'lib/ezutils/classes/ezini.php' );
       $ini =& eZINI::instance( 'setsection.ini' );
       //if ( !$ini->hasVariable( 'BeforePublish', 'D ) )
       // return EZ_WORKFLOW_TYPE_STATUS_ACCEPTED
       $defaultSection= $ini->variable( 'BeforePublish', 'Section' );
        // get object
	$parameters = $process->attribute( 'parameter_list' );
	$objectId= $parameters['object_id'];
	// This is the actual object begin edited or created
	$object =& eZContentObject::fetch( $parameters['object_id'] );

        $class = $object->contentClassIdentifier();
        if (array_key_exists($class,$defaultSection)) {
	  $object->SectionID=$defaultSection[$class];
	  // ??? Why do I need that ? (3.6 problem)
	  $object->store();
	}
       return EZ_WORKFLOW_TYPE_STATUS_ACCEPTED;
    }
}

eZWorkflowEventType::registerType
        ( EZ_WORKFLOW_TYPE_SETSECTION_ID, 
                'setsectiontype' );

?>
