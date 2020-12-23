<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class InsoftEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $harga_transaksi;
    protected $alasan_refund;
    protected $order_id; 
    protected $status;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($harga_transaksi, $alasan_refund, $order_id, $status)
    {
        $this->harga_transaksi = $harga_transaksi;
        $this->alasan_refund = $alasan_refund;
        $this->order_id = $order_id;
        $this->status = $status;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
       return $this->from('indra.rahdian@insoft-dev.com')
                   ->view('emailku')
                   ->with(
                    [
                        'nama' => 'Indra Rahdian',
                        'website' => 'www.insoft-dev.com',
                        'order_id' => $this->order_id,
                        'harga_transaksi'=>$this->harga_transaksi,
                        'alasan_refund'=>$this->alasan_refund,
                        'status'=>$this->status
                    ]);
    }
}