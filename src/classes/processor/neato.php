<?php

class plNeatoProcessor extends plExternalCommandProcessor 
{
    public function getInputTypes() 
    {
        return array( 
            'text/dot',
        );
    }

    public function getOutputType() 
    {
        return 'image/png';
    }

    public function execute( $infile, $outfile, $type ) 
    {
        exec(
            'neato -Tpng -o ' . escapeshellarg( $outfile ) . ' ' . escapeshellarg( $infile ),
            $output,
            $return
        );

        if ( $return !== 0 ) 
        {
            throw new plNeatoProcessorExecutionException( $output );
        }
    }
}

?>