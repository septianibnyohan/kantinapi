<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class RefundEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $jumlah;
    protected $alasan;
   
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jumlah, $alasan)
    {
        $this->jumlah = $jumlah;
        $this->alasan = $alasan;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
       return $this->from('indra.rahdian@insoft-dev.com')
                   ->view('wallet.email_refund')
                   ->with(
                    [
                        'nama' => 'Indra Rahdian',
                        'website' => 'www.PayFazz.com',
                        'alasan' => $this->alasan,
                        'jumlah'=>$this->jumlah
                    ]);
    }
}